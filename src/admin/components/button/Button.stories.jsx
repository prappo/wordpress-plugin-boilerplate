import { Button } from "./Button";

export default {
  title: "Components/Button",
  component: Button,
  tags: ["autodocs"],
};

export const DefaultButton = () => {
  return (
    <Button intent="default" size="md">
      Crate Task
    </Button>
  );
};

export const PrimaryButton = () => {
  return <Button intent="primary">Crate Task</Button>;
};
