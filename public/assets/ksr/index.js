function Get_Axios(url,h,p,call)
{
    axios.get(`${url}`,
    {
        params:p,
        headers:h
    }).then(function (response) {
        call(response,0)
    })
    .catch(function (error) {
        console.log(error)
        call(error,1)
    })
}

function SetToIdValue(id,value){
    console.log(id,value)
    document.getElementById(id).textContent = value
}

function StopLoading(){
    document.getElementById('loader').style.display = 'none'
    document.getElementById('root').style.display = 'block'
}

Get_Axios(ReqURL,{},{},(data,code)=>{
    if(code==0){
        StopLoading()
        let usableData = data.data;
        let serialNumber = usableData.detail.device_serial
        let deviceModel = usableData.detail.device_model
        let deviceName = usableData.detail.device_name
        let {from} = usableData.detail
        let {to} = usableData.detail
        let {today} = usableData.detail
        document.getElementById('title').textContent = 'گزارش دستگاه ' + deviceName
        SetToIdValue('deviceModel',deviceModel)
        SetToIdValue('DeviceSerial',serialNumber)
        SetToIdValue('DeviceName',deviceName)
        SetToIdValue('StartDate',from)
        SetToIdValue('EndDate',to)
        SetToIdValue('ReportDate',today)

        let humidLabel = []
        let humid1data = []
        let humid2data = []
        let humid3data = []
        let humid4data = []
        let humidData = usableData.humidity;
        humidData.forEach(item => {
            humidLabel.push(item.date)
            humid1data.push(item.humidity_1)
            humid2data.push(item.humidity_2)
            humid3data.push(item.humidity_3)
            humid4data.push(item.humidity_4)
        });



        new Chart(document.getElementById('humidutyChart'), {
            type: 'line',
            data: {
            labels: humidLabel,
            datasets: [{
                label: 'رطوبت 1',
                data:humid1data,
                borderWidth: 1,
                borderColor: 'red',
                backgroundColor: 'pink',
            },
            {
                label: 'رطوبت 2',
                data:humid2data,
                borderWidth: 1,
                borderColor: 'blue',
                backgroundColor: 'cyan',
            },
            {
                label: 'رطوبت 3',
                data:humid3data,
                borderWidth: 1,
                borderColor: 'green',
                backgroundColor: 'lime',
            },
            {
                label: 'رطوبت 4',
                data:humid4data,
                borderWidth: 1,
                borderColor: 'orange',
                backgroundColor: 'yellow',
            }]
            }
        });


        let templabel = []
        let temp1data = []
        let temp2data = []
        let temp3data = []
        let temp4data = []
        let labelData = usableData.temp;
        labelData.forEach(item => {
            templabel.push(item.date)
            temp1data.push(item.temp_1)
            temp2data.push(item.temp_2)
            temp3data.push(item.temp_3)
            temp4data.push(item.temp_4)
        });



        new Chart(document.getElementById('tempChart'), {
            type: 'line',
            data: {
            labels: templabel,
            datasets: [{
                label: 'دما 1',
                data:temp1data,
                borderWidth: 1,
                borderColor: '#ff0000',
                backgroundColor: '#ff5000',
            },
            {
                label: 'دما 2',
                data:temp2data,
                borderWidth: 1,
                borderColor: 'blue',
                backgroundColor: 'cyan',
            },
            {
                label: 'دما 3',
                data:temp3data,
                borderWidth: 1,
                borderColor: 'green',
                backgroundColor: 'lime',
            },
            {
                label: 'دما 4',
                data:temp4data,
                borderWidth: 1,
                borderColor: 'orange',
                backgroundColor: 'yellow',
            }]
            }
        });

        let humidTable = document.getElementById('humidityTable')
        let tempTable = document.getElementById('tempTable')

        let HTRT = document.createElement('tr')
        HTRT.innerHTML = `
        <td>زمان</td>
        <td>رطوبت 1</td>
        <td>رطوبت 2</td>
        <td>رطوبت 3</td>
        <td>رطوبت 4</td>
        `
        humidTable.appendChild(HTRT)

        let TTRT = document.createElement('tr')
        TTRT.innerHTML = `
        <td>زمان</td>
        <td>دما 1</td>
        <td>دما 2</td>
        <td>دما 3</td>
        <td>دما 4</td>
        `
        tempTable.appendChild(TTRT)

        let i = 0;
        while(i<templabel.length){
            let tempTr = document.createElement('tr')
            tempTr.innerHTML = `
            <td>${templabel[i]}</td>
            <td>${temp1data[i]}</td>
            <td>${temp2data[i]}</td>
            <td>${temp3data[i]}</td>
            <td>${temp4data[i]}</td>
            `
            tempTable.appendChild(tempTr)
            i++;
        }

        i = 0;
        while(i<humidLabel.length){
            let tempTr2 = document.createElement('tr')
            tempTr2.innerHTML = `
            <td>${humidLabel[i]}</td>
            <td>${humid1data[i]}</td>
            <td>${humid2data[i]}</td>
            <td>${humid3data[i]}</td>
            <td>${humid4data[i]}</td>
            `
            humidTable.appendChild(tempTr2)
            i++;
        }
    

    }else{
        alert('something went wrong')
    }
})

function Responsive(){
    let width = window.innerWidth;
    if(width<1200){
        let offset = width - 1200;
        document.querySelectorAll('.Chart').forEach(item=>{
            item.querySelector('canvas').style.marginLeft = `${offset/2}px`
        })
    }else{
        document.querySelectorAll('.Chart').forEach(item=>{
            item.querySelector('canvas').style.marginLeft = `0px`
        })
    }
    if(width<610){
        document.querySelectorAll('.Chart').forEach(item=>{
            item.querySelector('canvas').height = 400
        })
    }else{
        document.querySelectorAll('.Chart').forEach(item=>{
            item.querySelector('canvas').height = 600
        })  
    }
    if(width<410){
        document.querySelectorAll('.Chart').forEach(item=>{
            item.querySelector('canvas').height = 300
        })
    }

}
Responsive()
window.addEventListener('resize',()=>{
    Responsive()
})

function printFunc(){
    document.querySelectorAll('.Chart').forEach(item=>{
        item.querySelector('canvas').style.marginLeft = `unset`
    })
    window.print()
    let width = window.innerWidth;
    if(width>1200) return
    let offset = width - 1200;
    document.querySelectorAll('.Chart').forEach(item=>{
        item.querySelector('canvas').style.marginLeft = `${offset/2}px`
    })
}