import GmailIcon from "../../icons/gmail-icon";
import { StepProps } from "../../../../admin/types/account-types";

export default function Setp1({ stepCount, setProvider }: StepProps) {
  return (
    <div className="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
      <div className="px-6 py-4">
        <div className="flex items-center">
          <GmailIcon />

          <div className="ml-4">
            <div className="text-lg text-gray-900 font-semibold">
              Connect Your Google Account
            </div>
            <p className="text-gray-600">
              First, let's enable IMAP access for your Google account.
            </p>
          </div>
        </div>
        <ol className="list-decimal list-inside mt-4 text-gray-700">
          <li>On your computer, open Gmail.</li>
          <li>Click thegear icon in the top right corner.</li>
          <li>Click All Settings.</li>
          <li>Click the Forwarding and POP/IMAP tab.</li>
          <li>In the "IMAP access" section, select Enable IMAP.</li>
          <li>Click Save Changes.</li>
        </ol>
      </div>
      <div className="px-6 py-4 border-t border-gray-200">
        <button
          onClick={() => stepCount?.(2)}
          className="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
          Yes! IMAP has been enabled
        </button>
        <button
          onClick={() => setProvider?.("none")}
          className="px-4 py-2 bg-transparent text-blue-600 hover:underline focus:outline-none">
          Go Back
        </button>
      </div>
    </div>
  );
}
