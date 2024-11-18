import { FC } from "react";
import { ISvgIcon } from "./type";

const NotificationIcon: FC<ISvgIcon> = ({ className }) => {
  return (
    <>
      <svg
        className={className}
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none">
        <path
          d="M12.0201 2.91016C8.71009 2.91016 6.02009 5.60016 6.02009 8.91016V11.8002C6.02009 12.4102 5.76009 13.3402 5.45009 13.8602L4.30009 15.7702C3.59009 16.9502 4.08009 18.2602 5.38009 18.7002C9.69009 20.1402 14.3401 20.1402 18.6501 18.7002C19.8601 18.3002 20.3901 16.8702 19.7301 15.7702L18.5801 13.8602C18.2801 13.3402 18.0201 12.4102 18.0201 11.8002V8.91016C18.0201 5.61016 15.3201 2.91016 12.0201 2.91016Z"
          stroke="#0A0A0A"
          strokeMiterlimit="10"
          strokeLinecap="round"
        />
        <path
          d="M13.8699 3.20141C13.5599 3.11141 13.2399 3.04141 12.9099 3.00141C11.9499 2.88141 11.0299 2.95141 10.1699 3.20141C10.4599 2.46141 11.1799 1.94141 12.0199 1.94141C12.8599 1.94141 13.5799 2.46141 13.8699 3.20141Z"
          stroke="#0A0A0A"
          strokeMiterlimit="10"
          strokeLinecap="round"
          strokeLinejoin="round"
        />
        <path
          d="M15.02 19.0586C15.02 20.7086 13.67 22.0586 12.02 22.0586C11.2 22.0586 10.44 21.7186 9.90002 21.1786C9.36002 20.6386 9.02002 19.8786 9.02002 19.0586"
          stroke="#0A0A0A"
          strokeMiterlimit="10"
        />
      </svg>
    </>
  );
};

export default NotificationIcon;
