var data1=localStorage.getItem("complaints");
data1=data1.substring(1,data1.length-1);
var data2=JSON.parse(data1);
if(data2!=null)
{
    
    for(var i=1;i<=data2.count;i++)
    {
        var dt=document.getElementById("comp_table").innerHTML;
        var x=`<tr>
        <th>
            `+i+`
        </th>
        <th>
           `+data2[i].title+`
        </th>
        <th>
        `+data2[i].descrip+`
        </th>
        <th>
        `+data2[i].user_id+`
        </th>
        <th>
        `+data2[i].department+`
        </th>
        <th>
        `+data2[i].category+`
        </th>
        <th>
        `+data2[i].complaint_state+`
        </th>
        <th>
        `+data2[i].complaint_date+`
        </th>
        <th>
        `+data2[i].resource_url+`
        </th>
        <th>
       <button onclick=location.href='../php/emp_done_change.php?ref=`+data2[i].comp_id+`&i=resolved';><i class="fa fa-check" aria-hidden="true"></i></button>
        </th>
        <th>
        <button onclick=location.href='../php/emp_done_change.php?ref=`+data2[i].comp_id+`&i=could not be resolved';><i class="fa fa-times" aria-hidden="true"></i></button>
         </th>

    </tr>`;
    document.getElementById("comp_table").innerHTML=dt+x;
    }
}