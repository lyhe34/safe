import React from 'react';
import { createContext } from "react";
import { useState } from "react";

const StorageContext = createContext();

export default function()
{
    const [currentDirectory, setCurrentDirectory] = useState();

    return (
        <StorageContext.Provider value={{currentDirectory, setCurrentDirectory}}>

        </StorageContext.Provider>
    )
}