import { FC } from "react";
import { ISvgIcon } from "./type";

const CommonInboxIcon: FC<ISvgIcon> = ({ className }) => {
  return (
    <>
      <svg
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      fill="none"
      viewBox="0 0 15 15"
    >
      <path
        fill="currentColor"
        fillRule="evenodd"
        d="M1 2a1 1 0 00-1 1v9a1 1 0 001 1h13a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 1h13v.925a.448.448 0 00-.241.07L7.5 7.967 1.241 3.995A.448.448 0 001 3.925V3zm0 1.908V12h13V4.908L7.741 8.88a.45.45 0 01-.482 0L1 4.908z"
        clipRule="evenodd"
      ></path>
    </svg>
    </>
  );
};

export default CommonInboxIcon;
