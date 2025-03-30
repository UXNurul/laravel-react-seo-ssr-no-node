import React from "react";

export default function Page({ pageData }) {
    return (
        <div>
            <nav>dsdf</nav>
            <h1>{pageData.props.title}</h1>
            <p>{pageData.props.description}</p>
            <p>{pageData.props.message}</p>
            <p><strong>Contact:</strong> {pageData.props.email}</p>

            <p><strong>Component:</strong> {pageData.component}</p>
        </div>
    );
}
