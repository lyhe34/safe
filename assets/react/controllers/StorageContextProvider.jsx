import React from "react";
import { useState } from "react";
import StorageContext from "./StorageContext";

export default function({children})
{
    const [currentDirectory, setCurrentDirectory] = useState();

    return (
        <StorageContext.Provider value={{currentDirectory, setCurrentDirectory}}>
            {children}
        </StorageContext.Provider>
    )
}