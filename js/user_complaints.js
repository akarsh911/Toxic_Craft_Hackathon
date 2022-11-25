var data1=localStorage.getItem("complaints");
data1=data1.substring(1,data1.length-1);
const data=JSON.parse(data1);
if(data!=null)
{
    alert("");
    for(var i=1;i<=data.count;i++)
    {
        var dt=document.getElementById("comp_table").innerHTML;
        var x=`<tr>
        <th>
            `+i+`
        </th>
        <th>
           `+data[i].title+`
        </th>
        <th>
        `+data[i].descrip+`
        </th>
        <th>
        `+data[i].user_id+`
        </th>
        <th>
        `+data[i].department+`
        </th>
        <th>
        `+data[i].category+`
        </th>
        <th>
        `+data[i].complaint_state+`
        </th>
        <th>
        `+data[i].complaint_date+`
        </th>
        <th>
        `+data[i].resource_url+`
        </th>
    </tr>`;
    }
}