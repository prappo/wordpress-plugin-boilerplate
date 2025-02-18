import { useState, ChangeEvent, FormEvent } from "react";
import GmailIcon from "../../icons/gmail-icon";
import { StepProps } from "../../../../admin/types/account-types";

type FormData = {
  firstName: string;
  lastName: string;
  email: string;
  appPassword: string;
};

type FormErrors = {
  firstName: string;
  lastName: string;
  email: string;
  appPassword: string;
};

export default function Step3({ stepCount }: StepProps) {
  // State to store form data
  const [formData, setFormData] = useState<FormData>({
    firstName: "",
    lastName: "",
    email: "",
    appPassword: "",
  });

  const [errorMessage, setErrorMessage] = useState<String>(
    "Account already exists.",
  );
  const [errorMessageVisiblity, setErrorMessageVisiblity] =
    useState<Boolean>(false);
  const [successMessageVisiblity, setSuccessMessageVisiblity] =
    useState<Boolean>(false);

  const [formErrors, setFormErrors] = useState<FormErrors>({
    firstName: "",
    lastName: "",
    email: "",
    appPassword: "",
  });

  // Function to validate email format
  const isValidEmail = (email: string) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  };

  // Function to validate form fields
  const validate = () => {
    let errors: FormErrors = {
      firstName: "",
      lastName: "",
      email: "",
      appPassword: "",
    };
    let isValid = true;

    if (!formData.firstName) {
      errors.firstName = "First name is required";
      isValid = false;
    }

    if (!formData.lastName) {
      errors.lastName = "Last name is required";
      isValid = false;
    }

    if (!formData.email) {
      errors.email = "Email is required";
      isValid = false;
    } else if (!isValidEmail(formData.email)) {
      errors.email = "Email is not valid";
      isValid = false;
    }

    if (!formData.appPassword) {
      errors.appPassword = "App password is required";
      isValid = false;
    }

    setFormErrors(errors);
    return isValid;
  };

  // Handle form input
  const handleChange = (e: ChangeEvent<HTMLInputElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  // Handle form subission

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();

    setSuccessMessageVisiblity(false);
    setErrorMessageVisiblity(false);

    // Validate the form
    if (!validate()) return;

    try {
      const response = await fetch(
        wordpressPluginBoilerplate.apiUrl + "myplugin/v1/accounts/create",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(formData),
        },
      );

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      if (data.status) {
        if (data.status === "success") {
          setSuccessMessageVisiblity(true);
          setErrorMessageVisiblity(false);
        }

        if (data.status === "error") {
          setErrorMessageVisiblity(true);
          setSuccessMessageVisiblity(false);
        }
      }
      console.log(data);
      // Handle response or set form submission state
    } catch (error) {
      console.error("Error submitting form", error);
    }
  };

  return (
    <>
      <div className="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div className="px-6 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center">
              <GmailIcon />
              <div className="ml-4">
                <div className="text-lg text-gray-900 font-semibold">
                  Connect Your Google Account
                </div>
              </div>
            </div>
          </div>

          {successMessageVisiblity && (
            <div
              className="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
              role="alert">
              <span className="font-medium">Success!</span> Accont has been
              created successfully.
            </div>
          )}

          {errorMessageVisiblity && (
            <div
              className="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
              role="alert">
              <span className="font-medium">Error!</span>
              {errorMessage}
            </div>
          )}

          <form className="mt-6 space-y-4">
            <div className="flex gap-4">
              <div className="w-1/2">
                <input
                  type="text"
                  className="px-4 w-full py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
                  placeholder="First Name*"
                  value={formData.firstName}
                  name="firstName"
                  onChange={handleChange}
                />
                {formErrors.firstName && (
                  <p className="text-red-600">{formErrors.firstName}</p>
                )}
              </div>
              <div className="w-1/2">
                <input
                  type="text"
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
                  placeholder="Last Name*"
                  value={formData.lastName}
                  onChange={handleChange}
                  name="lastName"
                />
                {formErrors.lastName && (
                  <p className="text-red-600">{formErrors.lastName}</p>
                )}
              </div>
            </div>

            <input
              type="email"
              className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
              placeholder="Email*"
              name="email"
              value={formData.email}
              onChange={handleChange}
            />
            {formErrors.email && (
              <p className="text-red-600">{formErrors.email}</p>
            )}
            <input
              type="password"
              className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
              placeholder="App Password*"
              value={formData.appPassword}
              name="appPassword"
              onChange={handleChange}
            />
            {formErrors.appPassword && (
              <p className="text-red-600">{formErrors.appPassword}</p>
            )}
            <button
              onClick={handleSubmit}
              type="submit"
              className="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
              Connect
            </button>
            <button onClick={() => stepCount(2)}>Back</button>
          </form>
        </div>
      </div>
    </>
  );
}
