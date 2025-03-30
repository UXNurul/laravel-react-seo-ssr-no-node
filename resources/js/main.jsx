import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter } from "react-router-dom";
import App from "./App";
import { HelmetProvider } from "react-helmet-async";

// Laravel theke JSON parse kore initial data pass kortesi
const initialPageData = JSON.parse(
    document.getElementById("app").getAttribute("data-page")
);


ReactDOM.createRoot(document.getElementById("app")).render(
    <HelmetProvider>
    <React.StrictMode>
        <BrowserRouter>
            <App initialPageData={initialPageData} />
        </BrowserRouter>
    </React.StrictMode>
    </HelmetProvider>
);
