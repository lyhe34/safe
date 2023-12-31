import React from "react";
import DirectoryExplorer from "./DirectoryExplorer.jsx";
import DirectoryContent from "./DirectoryContent.jsx";
import StorageContextProvider from './StorageContextProvider.jsx';

export default function(props)
{
    return (
        <StorageContextProvider>
            <header className="d-flex align-items-center">
                <div className="brand">SAFE</div>
            </header>
            <main className="d-flex">
                <DirectoryExplorer rootDirectories={props.rootDirectories}/>
                <DirectoryContent/>
            </main>
        </StorageContextProvider>
    )
}