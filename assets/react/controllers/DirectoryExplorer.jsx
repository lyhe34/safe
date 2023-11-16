import React from 'react';
import DirectorySelector from './DirectorySelector';

export default function(props)
{
    return (
        <aside className='directory-explorer'>
            <div>
                <DirectorySelector name="Storage" path="root"/>
            </div>
        </aside>
    )
}