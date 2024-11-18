import {
  Button as AriaButton,
  ButtonProps as AriaButtonProps,
} from "react-aria-components";

import { VariantProps, tv } from "tailwind-variants";

const button = tv({
  base: "inline-flex appearance-none items-center justify-center  outline-none disabled:pointer-events-none border-[.5px] ",

  variants: {
    intent: {
      primary:
        "bg-primary text-white border-border-primaryButton shadow-primaryButton data-[hovered]:bg-primaryHover ",
      default:
        "bg-default text-slate-950 border-border-defaultButton shadow-defaultButton data-[hovered]:bg-defaultHover data-[hovered]:shadow-defaultHoverButton",
      icon: "border-none",
    },
    size: {
      sm: "text-[10px] font-semibold rounded-md h-[24px] w-[74px] px-2 py-[7px] ",
      md: "text-xs	font-medium leading-3 rounded-md h-[32px] w-[89px] p-[10px] ",
      lg: "text-sm	font-medium rounded-lg h-[40px] w-[112px] py-[13px] px-[16px] ",
      xl: "text-sm	font-semibold rounded-lg h-[48px] w-[121px] py-[17px] px-[20px] ",
      "2xl":
        "text-base	font-semibold rounded-[10px] h-[56px] w-[141px] py-[20px] px-[24px] ",
    },
  },
  compoundVariants: [],
  defaultVariants: {
    intent: "primary",
  },
});

type ButtonVariantProps = VariantProps<typeof button>;

interface ButtonProps extends AriaButtonProps, ButtonVariantProps {
  className?: string;
}

export const Button = ({
  className,
  size,
  intent,
  children,
  ...props
}: ButtonProps) => (
  <AriaButton className={button({ className, size, intent })} {...props}>
    {children}
  </AriaButton>
);

export default Button;
