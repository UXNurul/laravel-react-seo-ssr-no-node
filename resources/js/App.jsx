import React, { useState, useEffect } from "react";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    useLocation,
} from "react-router-dom";

import Navbar from "./components/Navbar";
import { Helmet } from "react-helmet-async";
import Page from "./pages/Page";
import AdminPage from "./pages/AdminPage";

export default function App({ initialPageData }) {
    const location = useLocation(); // Track route change
    const [pageData, setPageData] = useState(initialPageData);

    useEffect(() => {
        // Route change hole Laravel theke data abar fetch korbo
        fetch(window.location.pathname)
            .then((res) => res.text())
            .then((html) => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");
                const newPageData = JSON.parse(
                    doc.getElementById("app").getAttribute("data-page")
                );
                setPageData(newPageData);
            });
    }, [location.pathname]); // Only runs when route changes


    const [pages, setPages] = useState([]);

    useEffect(() => {
        fetch("/api/pages")
            .then((res) => res.json())
            .then((data) => setPages(data));
    }, []);

    return (
        <>
            <Helmet>
                <title>{pageData.props.title || "Default Title"}</title>
                <meta
                    name="description"
                    content={
                        pageData.props.description || "Default description"
                    }
                />
                <meta name="keywords" content="Laravel, React, SEO, SPA" />
                <meta name="robots" content="index, follow" />

                <meta
                    property="og:title"
                    content={pageData.props.title || "Default Title"}
                />
                <meta
                    property="og:description"
                    content={
                        pageData.props.description || "Default description"
                    }
                />
                <meta
                    property="og:image"
                    content={`${window.location.origin}/default-image.jpg`}
                />
                <meta property="og:url" content={window.location.href} />
            </Helmet>

            <Navbar pages={pages} />
            
            <Routes>
            <Route path="/" element={<Page pageData={pageData} />} />
            <Route path="/:slug" element={<Page pageData={pageData} />} />

            <Route path="/admin/pages" element={<AdminPage />} />

                {/* <Route path="/" element={<Home pageData={pageData} />} />
                <Route
                    path="/contact"
                    element={<Contact pageData={pageData} />}
                /> */}
            </Routes>
        </>
    );
}
