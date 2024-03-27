import fs from 'fs';
import { execSync } from 'child_process';

const DEFAULT_BUILD_FILE = 'build.json';

const readBuildFile = (buildFileName) => {
    try {
        const data = fs.readFileSync(buildFileName);
        return JSON.parse(data);
    } catch (error) {
        console.error(`Error reading ${buildFileName}: ${error.message}`);
        process.exit(1);
    }
};

const executeCommands = (commands) => {
    for (const key in commands) {
        console.log(`Executing command: ${commands[key]}`);
        try {
            execSync(commands[key], { stdio: 'inherit' });
        } catch (error) {
            console.error(`Error executing command ${key}: ${error.message}`);
            process.exit(1);
        }
    }
};

const main = () => {
    const buildFileName = process.argv[2] || DEFAULT_BUILD_FILE;
    const buildConfig = readBuildFile(buildFileName);

    if (buildConfig.commands) {
        executeCommands(buildConfig.commands);
    }

    if (buildConfig.delete) {
        buildConfig.delete.forEach((file) => {
            console.log(`Deleting: ${file}`);
            try {
                fs.rmSync(file, { force: true, recursive: true });
            } catch (error) {
                console.error(`Error deleting file ${file}: ${error.message}`);
                process.exit(1);
            }
        });
    }

    if (buildConfig.copy) {
        buildConfig.copy.forEach(({ src, dest }) => {
            console.log(`Copying from ${src} to ${dest}`);
            try {
                fs.copyFileSync(src, dest);
            } catch (error) {
                console.error(`Error copying files: ${error.message}`);
                process.exit(1);
            }
        });
    }

    if (buildConfig.move) {
        buildConfig.move.forEach(({ src, dest }) => {
            console.log(`Moving from ${src} to ${dest}`);
            try {
                fs.renameSync(src, dest);
            } catch (error) {
                console.error(`Error moving files: ${error.message}`);
                process.exit(1);
            }
        });
    }

    if (buildConfig.rename) {
        buildConfig.rename.forEach(({ src, dest }) => {
            console.log(`Renaming ${src} to ${dest}`);
            try {
                fs.renameSync(src, dest);
            } catch (error) {
                console.error(`Error renaming file: ${error.message}`);
                process.exit(1);
            }
        });
    }
};

main();
