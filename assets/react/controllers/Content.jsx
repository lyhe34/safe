import React from "react";

export default function(props)
{
    <div>
        <img src={'../images/' . props.image}></img>
        <div>{props.text}</div>
    </div>
}