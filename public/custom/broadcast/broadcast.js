$(document).ready(function () {
    const channel = Echo.channel("MyEvent");
    console.log("IN");
    channel.subscribed(() => {
      console.log("subscribed");
    }).listen('MyEvent',(event)=>{
      console.log(event);
    });
});
