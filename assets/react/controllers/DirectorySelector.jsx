import React from "react";
import { useState } from "react";
import toggleArrow from "../../images/angle-right.svg";
import folderImage from "../../images/folder.svg";

export default function(props)
{
    const [directories, setDirectories] = useState([]);

    const path = props.path;

    const fetchDirectories = () =>
    {
        fetch(`/getdirectories/${path}`)
        .then(response => response.json())
        .then(data => setDirectories([data]));
    }

    return (
        <div className="directory-selector">
            <div className="d-flex">
                <div onClick={fetchDirectories}>
                    <img src={toggleArrow} className="toggle-arrow"></img>
                </div>
                <div className="d-flex">
                    <img src={folderImage} className="folder-image"></img>
                    <div className="directory-selector-name">{props.name}</div>
                </div>
            </div>
            {directories.forEach((directory) => <DirectorySelector name={directory.name} path={directory.path}/>)}
        </div>
        
    )
}