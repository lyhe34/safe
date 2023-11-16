import React from "react";
import toggleArrow from "../../images/angle-right.svg";
import folderImage from "../../images/folder.svg";

export default function({name, path})
{
    return (
        <div className="d-flex directory-selector">
            <img src={toggleArrow} className="toggle-arrow"></img>
            <img src={folderImage} className="folder-image"></img>
            <div className="directory-selector-name">{name}</div>
        </div>
    )
}