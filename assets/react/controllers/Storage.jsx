import React from 'react';
import { createContext } from "react";
import { useState } from 'react';
import DirectoryExplorer from "./DirectoryExplorer.jsx";
import DirectoryContent from "./DirectoryContent.jsx";

export default function()
{
    const StorageContext = createContext();

    const [currentDirectory, setCurrentDirectory] = useState();

    return (
        <StorageContext.Provider value={{currentDirectory, setCurrentDirectory}}>
            <header className="d-flex align-items-center">
                <div className="brand">SAFE</div>
            </header>
            <main className="d-flex">
                <DirectoryExplorer/>
                <DirectoryContent/>
            </main>
        </StorageContext.Provider>
    )
}