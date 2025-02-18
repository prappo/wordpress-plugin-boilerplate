import EmailIcon from "../../icons/email-icon";

export default function Add() {
  return (
    <div className="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
      <div className="px-6 py-4">
        <div className="flex items-center justify-between">
          <div className="flex items-center">
            <EmailIcon />
            <div className="ml-4">
              <div className="text-lg text-gray-900 font-semibold">
                Any Provider IMAP / SMTP
              </div>
            </div>
          </div>
        </div>

        <form className="mt-6 space-y-4">
          <div className="flex gap-4">
            <input
              type="text"
              className="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300"
              placeholder="First Name*"
            />
            <input
              type="text"
              className="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300"
              placeholder="Last Name*"
            />
          </div>
          <input
            type="email"
            className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300"
            placeholder="Email*"
          />
          <input
            type="password"
            className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300"
            placeholder="Password"
          />
          <div className="flex gap-4">
            <input
              type="text"
              className="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300"
              placeholder="IMAP Host*"
            />
            <input
              type="text"
              className="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300"
              placeholder="IMAP Port*"
            />
          </div>
          <div className="flex items-center">
            {/* <label className="flex items-center">
              <input
                type="radio"
                name="encryption"
                className="form-radio"
                value="none"
              />
              <span className="ml-2">None</span>
            </label>
            <label className="flex items-center ml-6">
              <input
                type="radio"
                name="encryption"
                className="form-radio"
                value="ssl"
              />
              <span className="ml-2">SSL</span>
            </label>
            <label className="flex items-center ml-6">
              <input
                type="radio"
                name="encryption"
                className="form-radio"
                value="tls"
              />
              <span className="ml-2">TLS</span>
            </label> */}

            <ul className="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              <li className="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div className="flex items-center ps-3">
                  <input
                    id="horizontal-list-radio-id"
                    type="radio"
                    value="ssl"
                    name="list-radio"
                    className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                  />
                  <label
                    htmlFor="horizontal-list-radio-id"
                    className="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    SSL
                  </label>
                </div>
              </li>
              <li className="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div className="flex items-center ps-3">
                  <input
                    id="horizontal-list-radio-military"
                    type="radio"
                    value="tls"
                    name="list-radio"
                    className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                  />
                  <label
                    htmlFor="horizontal-list-radio-military"
                    className="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    TLS
                  </label>
                </div>
              </li>
              <li className="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div className="flex items-center ps-3">
                  <input
                    id="horizontal-list-radio-license"
                    type="radio"
                    value="none"
                    name="list-radio"
                    className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                  />
                  <label
                    htmlFor="horizontal-list-radio-license"
                    className="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    None
                  </label>
                </div>
              </li>
            </ul>
          </div>
          <div className="flex items-center mt-4">
            {/* <label className="flex items-center">
          <input type="checkbox" className="form-checkbox" />
          <span className="ml-2">Authentication</span>
        </label> */}

            <label className="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" value="" className="sr-only peer" />
              <div className="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
              <span className="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                Authentication
              </span>
            </label>
          </div>
          <button
            type="submit"
            className="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Connect
          </button>
        </form>
      </div>
    </div>
  );
}
