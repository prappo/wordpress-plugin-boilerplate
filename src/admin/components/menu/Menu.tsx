import type {
  MenuItemProps,
  MenuProps,
  MenuTriggerProps,
} from "react-aria-components";

import {
  Menu,
  MenuItem as AriaMenuItemMenuItem,
  MenuTrigger as AriaMenuTrigger,
  Section,
  Popover,
} from "react-aria-components";
import Button from "../button/Button";
import { tv } from "tailwind-variants";

export const menu = tv({
  slots: {
    menuPopoverClass:
      "border-border-default bg-white data-[entering]:animate-fade data-[exiting]:animate-fadeOut overflow-auto rounded-md border shadow-border",
    menuContentClass: "flex h-fit w-56 flex-col gap-2 p-2 outline-none",
    item: "data-[focused]:text-blue-700 border border-transparent data-[focused]:border data-[focused]:border-border-default data-[focused]:shadow-border font-medium relative flex cursor-pointer justify-between rounded-md p-2 outline-none",
  },
});

const { menuPopoverClass, menuContentClass, item } = menu();

interface MyMenuButtonProps<T>
  extends MenuProps<T>,
    Omit<MenuTriggerProps, "children"> {
  label?: any;
}

function MyMenuButton<T extends object>({
  label,
  children,
  ...props
}: MyMenuButtonProps<T>) {
  return (
    <AriaMenuTrigger {...props}>
      <Button intent="icon">{label}</Button>
      <Popover className={menuPopoverClass()}>
        <Menu {...props} className={menuContentClass()}>
          {children}
        </Menu>
      </Popover>
    </AriaMenuTrigger>
  );
}

const MenuItem = ({
  children,
  className,
  ...props
}: MenuItemProps & { className?: string }) => (
  <AriaMenuItemMenuItem {...props} className={item({ className })}>
    {children}
  </AriaMenuItemMenuItem>
);

export { MenuItem, Section, MyMenuButton, menuPopoverClass, menuContentClass };
