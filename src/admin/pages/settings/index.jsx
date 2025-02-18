import { Separator } from "@/components/ui/separator"
import { ProfileForm } from "@/admin/pages/settings/profile-form"
import SettingsLayout from "@/admin/pages/settings/layout"

export default function Settings() {
  return (
    <SettingsLayout>
    <div className="space-y-6">
      <div>
        <h3 className="text-lg font-medium">Profile</h3>
        <p className="text-sm text-muted-foreground">
          This is how others will see you on the site.
        </p>
      </div>
      <Separator />
      <ProfileForm />
    </div>
    </SettingsLayout>
  )
}