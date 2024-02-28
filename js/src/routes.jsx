import { createHashRouter } from "react-router-dom";
import ApplicationLayout from "./components/application-layout/ApplicationLayout";
import Settings from "./pages/settings";
import ErrorPage from "./pages/error/Error";
import Inbox from "./pages/inbox";
import Dashboard from "./pages/dashboard";
export const router = createHashRouter([
  {
    path: "/",
    element: <ApplicationLayout />,
    errorElement: <ErrorPage />,
    children: [
      {
        path: "dashboard",
        element: <Dashboard />,
      },
      {
        path: "inbox",
        element: <Inbox />,
      },
     
      {
        path: "settings",
        element: <Settings />,
      },
    ],
  },
]);
