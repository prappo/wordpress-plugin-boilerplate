import {
  Menu as AriaMenu,
  MenuItem as AriaMenuItemMenuItem,
  MenuTrigger as AriaMenuTrigger,
  Section as AriaSection,
  Popover,
} from "react-aria-components";
import type { MenuProps, MenuTriggerProps } from "react-aria-components";
import Button from "../button/Button";
import { tv } from "tailwind-variants";

export const menu = tv({
  slots: {
    menuPopover:
      "border-border-default bg-white data-[entering]:animate-fade data-[exiting]:animate-fadeOut overflow-auto rounded-md border shadow-border",
    content: "flex h-fit w-56 flex-col gap-2 p-2 outline-none",
    item: "data-[focused]:text-blue-700 border border-transparent data-[focused]:border data-[focused]:border-border-default data-[focused]:shadow-border font-medium relative flex cursor-pointer justify-between rounded-md p-2 outline-none",
  },
});

const { menuPopover, content, item } = menu();

const MenuTrigger = AriaMenuTrigger;
const Section = AriaSection;

interface MyMenuButtonProps<T>
  extends MenuProps<T>,
    Omit<MenuTriggerProps, "children"> {
  label?: string;
}

function MyMenuButton<T extends object>({
  label,
  children,
  ...props
}: MyMenuButtonProps<T>) {
  return (
    <AriaMenuTrigger {...props}>
      <Button intent="icon">{label}</Button>
      <Popover className={menuPopover()}>
        <AriaMenu {...props} className={content()}>
          {children}
        </AriaMenu>
      </Popover>
    </AriaMenuTrigger>
  );
}

const MenuConent = ({
  children,
  className,
  ...props
}: any & { className?: string }) => (
  <Popover {...props} className={menuPopover()}>
    <AriaMenu className={content({ className })}>{children}</AriaMenu>
  </Popover>
);

const MenuItem = ({
  children,
  className,
  ...props
}: any & { className?: string }) => (
  <AriaMenuItemMenuItem {...props} className={item({ className })}>
    {children}
  </AriaMenuItemMenuItem>
);

export { MenuConent, MenuItem, MenuTrigger, Section, MyMenuButton };
