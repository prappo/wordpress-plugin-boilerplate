import { FC } from "react";
import { ISvgIcon } from "./type";

const CrmIcon: FC<ISvgIcon> = ({ className }) => {
  return (
    <>
      <svg
        className={className}
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
          d="M18 18.86H17.24C16.44 18.86 15.68 19.17 15.12 19.73L13.41 21.42C12.63 22.19 11.36 22.19 10.58 21.42L8.87 19.73C8.31 19.17 7.54 18.86 6.75 18.86H6C4.34 18.86 3 17.53 3 15.89V4.97C3 3.33 4.34 2 6 2H18C19.66 2 21 3.33 21 4.97V15.88C21 17.52 19.66 18.86 18 18.86Z"
          strokeWidth="1.5"
          strokeMiterlimit="10"
          strokeLinecap="round"
          strokeLinejoin="round"
        />
        <path
          d="M12.0701 8.95078C12.0301 8.95078 11.97 8.95078 11.92 8.95078C10.87 8.91078 10.04 8.06078 10.04 7.00078C10.04 5.92078 10.9101 5.05078 11.9901 5.05078C13.0701 5.05078 13.9401 5.93078 13.9401 7.00078C13.9501 8.06078 13.1201 8.92078 12.0701 8.95078Z"
          strokeWidth="1.5"
          strokeLinecap="round"
          strokeLinejoin="round"
        />
        <path
          d="M9.24994 11.9609C7.91994 12.8509 7.91994 14.3009 9.24994 15.1909C10.7599 16.2009 13.2399 16.2009 14.7499 15.1909C16.0799 14.3009 16.0799 12.8509 14.7499 11.9609C13.2399 10.9609 10.7699 10.9609 9.24994 11.9609Z"
          strokeWidth="1.5"
          strokeLinecap="round"
          strokeLinejoin="round"
        />
      </svg>
    </>
  );
};

export default CrmIcon;
