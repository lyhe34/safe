import React from 'react';
import DirectorySelector from './DirectorySelector';

export default function()
{
    return (
        <aside className='directory-explorer'>
            <div>
                <DirectorySelector name = "Storage" path=""/>
            </div>
        </aside>
    )
}