window.onload = function(){
    let btn = document.getElementsByTagName('button')[0]
    let city_btn = document.getElementsByTagName('button')[1]
    let country = document.getElementsByTagName('input')[0]
    let result = document.getElementById('result')
    let xml = new XMLHttpRequest()

    btn.addEventListener('click', function(e){
        e.preventDefault()
        result.innerHTML = ''
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

    city_btn.addEventListener('click', function(e){
        e.preventDefault()
        result.innerHTML = ''
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
        xml.open('GET', 'world.php?country=' + city_btn.value + "&lookup=cities", true)
        xml.send()
    })

}