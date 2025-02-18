

import { MailComp } from "@/components/inbox/mail"
import { accounts, mails } from "@/admin/pages/inbox/data"

export default function MailPage() {


  return (
    <>
     
      <div className="hidden dark:bg-gray-900 flex-col md:flex">
        <MailComp
          accounts={accounts}
          mails={mails}
          defaultLayout={[265, 440, 655]}
          defaultCollapsed={false}
          navCollapsedSize={4}
        />
      </div>
    </>
  )
}