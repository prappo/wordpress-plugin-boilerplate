export default function AddWidget() {
  return (
    <div className="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg shadow-md max-w-sm mx-auto">
      <div className="bg-gray-100 p-4 rounded-full">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          strokeWidth={1.5}
          stroke="currentColor"
          className="w-6 h-6">
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
          />
        </svg>
      </div>
      <h1 className="mt-4 text-xl font-semibold text-center text-gray-700">
        Add an email account
      </h1>
      <p className="text-sm text-center text-gray-500">
        You need to add email accounts to continue
      </p>
      <button className="mt-4 px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline">
        Add Email Account
      </button>
    </div>
  );
}
