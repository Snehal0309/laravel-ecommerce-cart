import AppLogoIcon from './app-logo-icon';
import { Link } from '@inertiajs/inertia-react';


export default function AppLogo() {
    return (
        <>
            <div className="bg-sidebar-primary text-sidebar-primary-foreground flex aspect-square size-8 items-center justify-center rounded-md">
                <AppLogoIcon className="size-5 fill-current text-white dark:text-black" />
            </div>
            <div className="ml-1 grid flex-1 text-left text-sm">
                <span className="mb-0.5 truncate leading-none font-semibold">Laravel Starter Kit</span>
                {/* <a href='/products/create'>Product add</a> */}
                <Link href="/products/create">Product add</Link>
                <Link href="/products">Product List</Link>


            </div>
        </>
    );
}
