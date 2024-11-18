import {
    CircleUser,
    Home,
    Mail,
    Menu,
    SlidersHorizontal,
    Package2,
    BarChart

} from "lucide-react"
import { useEffect } from "react";
import { Button } from "@/components/ui/button"
import { ModeToggle } from "../mode-toggle";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import { Input } from "@/components/ui/input"
import { Sheet, SheetContent, SheetTrigger } from "@/components/ui/sheet"
import { NavLink, Outlet, useLocation, useNavigate } from "react-router-dom";
import Logo from "../Icons/Logo";
import { clsx } from "clsx";


const navigation = [
    {
        name: "Dashboard",
        href: "dashboard",
        icon: Home,
        current: true,
    },
    {
        name: "Inbox",
        href: "inbox",
        icon: Mail,
        current: false,
    },

    {
        name: "Settings",
        href: "settings",
        icon: SlidersHorizontal,
        current: false,
    },
    {
        name: "Charts",
        href: "charts",
        icon: BarChart,
        current: false,
    }
];

export default function LayoutOne() {
    let showApplicationLayout = !wordpressPluginBoilerplate.isAdmin;
    let location = useLocation();
    const navigate = useNavigate();
    const pageTitle = location.pathname.split("/")[1];
    if(location.pathname === "/login") {
        showApplicationLayout = false;
    }
    useEffect(() => {
        if (pageTitle) {
          navigate(pageTitle);
        } else {
          navigate(navigation[0].href);
        }
      }, []);

    return (
        <div className={`grid min-h-screen w-full ${showApplicationLayout ? 'md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]' : ''}`}>
            {showApplicationLayout && <div className="hidden border-r bg-muted/40 md:block">
                <div className="flex h-full max-h-screen flex-col gap-2">
                    <div className="flex h-14 items-center border-b px-4 lg:h-[60px] lg:px-6">
                        <a href="#/dashboard" className="flex items-center gap-2 font-semibold">
                            <Logo />
                            <span className="">Plugin Name</span>
                        </a>
                       
                    </div>
                    <div className="flex-1">
                        <nav className="grid items-start px-2 text-sm font-medium lg:px-4">
                            {navigation.map((item,index) => {
                                return <NavLink
                                    to={item.href}
                                    key={index}
                                    className={
                                        clsx(
                                            "flex items-center gap-3 rounded-lg px-3 py-2  transition-all hover:text-primary",
                                            item.href === pageTitle
                                                ? "text-primary bg-muted"
                                                : "text-muted-foreground"
                                        )
                                    }
                                >
                                    <item.icon className="h-5 w-5" />
                                    {item.name}
                                </NavLink>
                            })}


                        </nav>
                    </div>
                
                </div>
            </div>
            }
            <div className="flex flex-col">
                {showApplicationLayout && 
                <header className="flex h-14 items-center gap-4 border-b bg-muted/40 px-4 lg:h-[60px] lg:px-6">
                    <Sheet>
                        <SheetTrigger asChild>
                            <Button
                                variant="outline"
                                size="icon"
                                className="shrink-0 md:hidden"
                            >
                                <Menu className="h-5 w-5" />
                                <span className="sr-only">Toggle navigation menu</span>
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="left" className="flex flex-col">
                            <nav className="grid gap-2 text-lg font-medium">
                                <a
                                    href="#"
                                    className="flex items-center gap-2 text-lg font-semibold"
                                >
                                    <Package2 className="h-6 w-6" />
                                    <span className="sr-only">Plugin Name</span>
                                </a>
                                {navigation.map((item,index) => {
                                    return <NavLink
                                        to={item.href}
                                        key={index}
                                        className={
                                            clsx(
                                                "flex items-center gap-3 rounded-lg px-3 py-2  transition-all hover:text-primary",
                                                item.href === pageTitle
                                                    ? "text-primary bg-muted"
                                                    : "text-muted-foreground"
                                            )
                                        }
                                    >
                                        <item.icon className="h-5 w-5" />
                                        {item.name}
                                    </NavLink>
                                })}


                            </nav>
                          
                        </SheetContent>
                    </Sheet>
                    <div className="w-full flex items-center h-full">

                    </div>
                    <ModeToggle />
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <Button variant="secondary" size="icon" className="rounded-full">
                                <CircleUser className="h-5 w-5" />
                                <span className="sr-only">Toggle user menu</span>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end">
                            <DropdownMenuLabel>My Account</DropdownMenuLabel>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem>Settings</DropdownMenuItem>
                            <DropdownMenuItem>Support</DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem>Logout</DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </header>
                }
                <main>
                    <Outlet />
                </main>
            </div>
        </div>
    )
}
