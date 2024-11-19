import GmailIcon from "./icons/gmail-icon";
import OutlookIcon from "./icons/outlook-icon";
import EmailIcon from "./icons/email-icon";

export default function ConnectAccount() {
  return (
    <div className="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg max-w-sm mx-auto">
      <h2 className="text-2xl font-semibold text-gray-800">
        Connect an account
      </h2>
      <p className="mt-2 text-gray-600 text-sm">
        Thank you for choosing FluentCRM. An easier way to manage email
        marketing campaigns!
      </p>

      <div className="w-full mt-6">
        <div className="flex items-center justify-between p-4 mb-4 bg-gray-100 rounded-lg">
          <span className="flex w-full justify-between items-center">
            <GmailIcon />
            {/* <img
              src="/path-to-google-icon.png"
              alt="Google Icon"
              className="w-6 h-6"
            /> */}

            <span className="ml-2 w-full text-gray-700">Gmail</span>
          </span>
        </div>

        <div className="flex items-center justify-between p-4 mb-4 bg-gray-100 rounded-lg">
          <span className="flex items-center">
            {/* <img
              src="/path-to-microsoft-icon.png"
              alt="Microsoft Icon"
              className="w-6 h-6"
            /> */}
            <OutlookIcon />
            <span className="ml-2 text-gray-700">Office 365 / Outlook</span>
          </span>
        </div>

        <div className="flex items-center justify-between p-4 bg-gray-100 rounded-lg">
          <span className="flex items-center">
            {/* <img
              src="/path-to-generic-email-icon.png"
              alt="Generic Email Icon"
              className="w-6 h-6"
            /> */}
            <EmailIcon />
            <span className="ml-2 text-gray-700">Any Provider</span>
          </span>
          <span className="text-sm text-gray-500">IMAP / SMTP</span>
        </div>
      </div>
    </div>
  );
}
