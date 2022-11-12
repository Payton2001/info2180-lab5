window.onload = function(){
    let btn = document.getElementsByTagName('button')[0]
    let country = document.getElementsByTagName('input')[0]
    let result = document.getElementById('result')
    let url = 'world.php'
    let xml = new XMLHttpRequest()

    btn.addEventListener('click', function(e){
        e.preventDefault()
        xml.onload = function(){
            if (xml.status == 200){
                let respond = result.innerHTML = xml.responseText
                result.innerHTML = respond
                console.log(respond)
            }
            else{
                alert(Error)
            }
        }
        xml.open('GET', 'world.php?country=' + country.value, true)
        xml.send()
    })

}