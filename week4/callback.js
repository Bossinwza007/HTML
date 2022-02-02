function createqoute(quote,callback){
    let myquote = "Like i always say,"+quote;
    callback(myquote); //2
}

function logquote(quote) {
    console.log(quote+'Yes');
}

createqoute("you will getting better!,",logquote); //1