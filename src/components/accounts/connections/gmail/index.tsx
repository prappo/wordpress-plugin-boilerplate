import { useState } from "react";
import Step1 from "./step-1";
import Step2 from "./step-2";
import Step3 from "./step-3";

import { StepProps } from "../../../../admin/types/account-types";

export default function GmailAccount({ setProvider }: StepProps) {
  const [steps, setSteps] = useState<number>(1);

  return (
    <div>
      {steps === 1 && <Step1 stepCount={setSteps} setProvider={setProvider} />}
      {steps === 2 && <Step2 stepCount={setSteps} />}
      {steps === 3 && <Step3 stepCount={setSteps} />}
    </div>
  );
}
