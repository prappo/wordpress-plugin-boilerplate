#!/usr/bin/env node

import axios from 'axios';
import inquirer from 'inquirer';
import extract from 'extract-zip';
import fs from 'fs';
import path from 'path';
import { execSync } from 'child_process';

const isComposerInstalled = () => {
    try {
        // Run "composer --version" command and capture the output
        const output = execSync('composer --version', { encoding: 'utf-8' });
        console.log('Composer is installed:', output.trim());
        return true;
    } catch (error) {
        console.error('Composer is not installed.');
        return false;
    }
};

const downloadAndExtractRepo = async (repoUrl, destFolder) => {
    const tempFolder = path.join(process.cwd(), '_temp_extract'); // Temporary directory

    try {
        const response = await axios.get(repoUrl, { responseType: 'arraybuffer' });
        fs.writeFileSync(`${destFolder}.zip`, response.data);
        await extract(`${destFolder}.zip`, { dir: tempFolder });

        // Ensure the destination directory exists
        if (!fs.existsSync(destFolder)) {
            fs.mkdirSync(destFolder);
        }

        // Move the contents of the extracted directory to the destination directory
        const files = fs.readdirSync(path.join(tempFolder, 'wordpress-plugin-boilerplate-main'));
        for (const file of files) {
            fs.renameSync(
                path.join(tempFolder, 'wordpress-plugin-boilerplate-main', file),
                path.join(destFolder, file)
            );
        }
    } finally {
        // Clean up the temporary directory
        fs.rmSync(tempFolder, { recursive: true });
        fs.unlinkSync(`${destFolder}.zip`);
    }
};

const capitalizeWords = (str) => {
    return str.split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join('');
  }

const renameFilesAndReplaceText = async (pluginName, textDomain, folderPath) => {
    const replaceInFile = (filePath) => {
        const content = fs.readFileSync(filePath, 'utf8');
    
        const updatedContent = content.replace(/MyPlugin|myplugin|my-plugin|MYPLUGIN/g, (match) => {
            if (match === 'MyPlugin') {
                return capitalizeWords(pluginName);
            } else if (match === 'myplugin') {
                return pluginName.toLowerCase().replace('-','_');
            } else if (match === 'MYPLUGIN') {
                return pluginName.toUpperCase();
            }
            return match;
        }).replace(/\bmy-plugin\b/g, textDomain); // Replace 'my-plugin' as a whole word with the lowercase plugin name
    
        fs.writeFileSync(filePath, updatedContent, 'utf8');
    };
    
    // Rename my-plugin.php to the desired name (e.g., cool.php)
    const oldFilePath = path.join(folderPath, 'my-plugin.php');
    const newFilePath = path.join(folderPath, `${pluginName}.php`);

    fs.renameSync(oldFilePath, newFilePath);

    // Iterate over all files in the directory and replace text
    const files = fs.readdirSync(folderPath);
    for (const file of files) {
        const filePath = path.join(folderPath, file);
        if (fs.statSync(filePath).isFile()) {
            replaceInFile(filePath);
        }
    }
};



const main = async () => {
    // Check if Composer is installed
    if (!isComposerInstalled()) {
        console.log('Please install Composer before proceeding.');
        return;
    }

    const { pluginName, textDomain } = await inquirer.prompt([
        { type: 'input', name: 'pluginName', message: 'Enter plugin name:' },
        { type: 'input', name: 'textDomain', message: 'Enter text domain:' },
    ]);

    const repoUrl = 'https://github.com/prappo/wordpress-plugin-boilerplate/archive/main.zip';
    const destFolder = path.join(process.cwd(), pluginName);

    await downloadAndExtractRepo(repoUrl, destFolder);
    await renameFilesAndReplaceText(pluginName, textDomain, destFolder);

    console.log('WordPress plugin boilerplate successfully initialized!');
    console.log(`cd ${pluginName}`);
    console.log('composer install');
    console.log('npm install');
};

main();
