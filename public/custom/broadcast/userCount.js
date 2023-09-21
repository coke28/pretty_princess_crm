$(document).ready(function () {
    
    // const channel = Echo.channel("LoginEvent");
    // console.log("IN");

    //PUBLIC CHANNEL  TEMPLATE
   // const channel = Echo.channel("channel_name");
    // channel.subscribed(() => {
    //   console.log("subscribed");
    // }).listen('.event name',(event)=>{
    //   console.log(event);
    // });

    //PUBLIC CHANNEL  TEMPLATE
    // const channel = Echo.private("channel_name");
    // channel.subscribed(() => {
    //   console.log("subscribed");
    // }).listen('.event name',(event)=>{
    //   console.log(event);
    // });

     //PRESENCE CHANNEL  TEMPLATE
    const channel = Echo.join("presence.user.1");
    //subcribing to presence.user.1 channel
    var onlineUserCount = 0;
    channel.here((users) => {
      console.log(users);
      onlineUserCount = users.length;
      updateUserCard(onlineUserCount);
    //when someone subcribes to the channel, do this
    }).joining((user)=>{
      onlineUserCount = onlineUserCount + 1;
      console.log(user + 'has come online');
      updateUserCard(onlineUserCount);
    
    })
      //when someone leaves to the channel, do this
    .leaving((user)=>{
      onlineUserCount = onlineUserCount - 1;
      console.log(user + 'has come offline');
      updateUserCard(onlineUserCount);
   
    });
     // }).listen('.event',(event)=>{
    //   console.log(event);
    // });


    function updateUserCard(userCount){
      $('#online-user-count').text(userCount);

    }
});
