import React, { useEffect, useState } from "react";

export default function AdminPage() {
    const [pages, setPages] = useState([]);
    const [formData, setFormData] = useState({
        component: "",
        title: "",
        description: "",
        keywords: "",
        message: "",
        subtitle: "",
        email: "",
    });
    const [editingId, setEditingId] = useState(null); // Edit mode এর জন্য state

    useEffect(() => {
        fetch("/api/pages")
            .then((res) => res.json())
            .then((data) => setPages(data));
    }, []);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        if (editingId) {
            // Update API Call
            fetch(`/api/pages/${editingId}`, {
                method: "PUT",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(formData),
            })
                .then((res) => res.json())
                .then((updatedPage) => {
                    setPages(pages.map((page) => (page.id === editingId ? updatedPage : page)));
                    setEditingId(null);
                    resetForm();
                });
        } else {
            // Create API Call
            fetch("/api/pages", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(formData),
            })
                .then((res) => res.json())
                .then((newPage) => {
                    setPages([...pages, newPage]);
                    resetForm();
                });
        }
    };

    const handleEdit = (page) => {
        setFormData(page);
        setEditingId(page.id);
    };

    const handleDelete = (id) => {
        fetch(`/api/pages/${id}`, { method: "DELETE" })
            .then((res) => res.json())
            .then(() => {
                setPages(pages.filter((page) => page.id !== id));
            });
    };

    const resetForm = () => {
        setFormData({
            component: "",
            title: "",
            description: "",
            keywords: "",
            message: "",
            subtitle: "",
            email: "",
        });
        setEditingId(null);
    };

    return (
        <div className="container mx-auto p-6">
            <h2 className="text-2xl font-semibold text-gray-800 mb-4">Manage Pages</h2>

            <form onSubmit={handleSubmit} className="bg-white shadow-md rounded-lg p-6 mb-6">
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input name="component" placeholder="Component" value={formData.component} onChange={handleChange} required className="input-field" />
                    <input name="title" placeholder="Title" value={formData.title} onChange={handleChange} required className="input-field" />
                    <textarea name="description" placeholder="Description" value={formData.description} onChange={handleChange} className="input-field h-24"></textarea>
                    <input name="keywords" placeholder="Keywords" value={formData.keywords} onChange={handleChange} className="input-field" />
                    <input name="message" placeholder="Message" value={formData.message} onChange={handleChange} className="input-field" />
                    <input name="subtitle" placeholder="Subtitle" value={formData.subtitle} onChange={handleChange} className="input-field" />
                    <input name="email" type="email" placeholder="Email" value={formData.email} onChange={handleChange} className="input-field" />
                </div>
                <button type="submit" className="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    {editingId ? "Update Page" : "Add Page"}
                </button>
                {editingId && (
                    <button type="button" onClick={resetForm} className="mt-2 w-full bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                        Cancel Edit
                    </button>
                )}
            </form>

            <table className="w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead className="bg-blue-500 text-white">
                    <tr>
                        <th className="px-4 py-2">Component</th>
                        <th className="px-4 py-2">Title</th>
                        <th className="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {pages.map((page) => (
                        <tr key={page.id} className="border-b">
                            <td className="px-4 py-2">{page.component}</td>
                            <td className="px-4 py-2">{page.title}</td>
                            <td className="px-4 py-2 flex space-x-2">
                                <button onClick={() => handleEdit(page)} className="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-lg transition duration-300">
                                    Edit
                                </button>
                                <button onClick={() => handleDelete(page.id)} className="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg transition duration-300">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
