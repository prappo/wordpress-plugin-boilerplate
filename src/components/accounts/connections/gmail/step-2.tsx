import GmailIcon from "../../icons/gmail-icon";
import { StepProps } from "../../../../admin/types/account-types";

export default function Step2({ stepCount }: StepProps) {
  return (
    <div className="max-w-xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
      <div className="px-6 py-4">
        <div className="flex items-center justify-between">
          <div className="flex justify-center w-full items-center">
            <GmailIcon />

            <div className="ml-4">
              <div className="text-lg text-gray-900 font-semibold">
                Connect Your Google Account
              </div>
            </div>
          </div>
        </div>

        <h3 className="mt-4 text-gray-800 font-semibold text-center">
          Select a connection option
        </h3>

        <div className="mt-6">
          <div
            onClick={() => stepCount?.(3)}
            className="mb-4 cursor-pointer p-4 bg-gray-50 rounded-lg shadow">
            <div className="flex justify-between">
              <h4 className="text-gray-900 font-semibold">Option 1: OAuth</h4>
              <span className="text-xs font-semibold text-green-500 bg-green-100 rounded-full px-3 py-1">
                RECOMMENDED
              </span>
            </div>
            <ul className="mt-2">
              <li className="flex items-center">
                {/* Insert check icon SVG here */}
                <span className="ml-2 text-gray-700">
                  Select a connection option
                </span>
              </li>
              <li className="flex items-center">
                {/* Insert check icon SVG here */}
                <span className="ml-2 text-gray-700">
                  By accessing or using any part of the Website
                </span>
              </li>
              <li className="flex items-center">
                {/* Insert check icon SVG here */}
                <span className="ml-2 text-gray-700">
                  By accessing or using any part of the Website
                </span>
              </li>
            </ul>
          </div>

          <div className="p-4 bg-gray-50 rounded-lg shadow">
            <h4 className="text-gray-900 font-semibold">
              Option 2: App Password
            </h4>
            <ul className="mt-2">
              <li className="flex items-center">
                {/* Insert check icon SVG here */}
                <span className="ml-2 text-gray-700">
                  Select a connection option
                </span>
              </li>
              <li className="flex items-center">
                {/* Insert warning icon SVG here */}
                <span className="ml-2 text-gray-700">
                  By accessing or using any part of the Website
                </span>
              </li>
              <li className="flex items-center">
                {/* Insert warning icon SVG here */}
                <span className="ml-2 text-gray-700">
                  By accessing or using any part of the Website
                </span>
              </li>
            </ul>
          </div>
        </div>
        <button onClick={() => stepCount?.(1)}>Back</button>
      </div>
    </div>
  );
}
