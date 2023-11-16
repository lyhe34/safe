import React from "react";
import { useContext } from 'react';
import StorageContext from './StorageContext.jsx';

export default function()
{
    const storageContext = useContext(StorageContext);

    return (
        <div className="directory-content">
            <div className="directory-content-current-path">Storage/Documents/Images</div>
        </div>
    )
}