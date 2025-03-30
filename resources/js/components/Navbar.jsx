import { Link } from "react-router-dom";

export default function Navbar({ pages }) {
    return (
        <nav className="bg-blue-600 text-white p-4 flex space-x-4">
            {pages.map((page) => (
                <Link 
                    key={page.id} 
                    to={`/${page.component.toLowerCase()}`} 
                    className="hover:underline"
                >
                    {page.component}
                </Link>
            ))}
            <Link to="/admin/pages" className="hover:underline">Pages</Link>
        </nav>
    );
}
