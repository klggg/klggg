/************************************************************************
 *  Copyright 2010-2011 Worlize Inc.
 *  
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *  
 *      http://www.apache.org/licenses/LICENSE-2.0
 *  
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 ***********************************************************************/

function Whiteboard(canvasId) {
    
    // Define accepted commands
    this.messageHandlers = {
        initCommands: this.initCommands.bind(this),
        clear: this.clear.bind(this),
        doContent: this.doContent.bind(this)        
        
    };

};

Whiteboard.prototype.connect = function() {
    var url = "ws://" + document.URL.substr(7).split('/')[0];
    
    var wsCtor = window['MozWebSocket'] ? MozWebSocket : WebSocket;
    this.socket = new wsCtor(url, 'whiteboard-example');

    this.socket.onmessage = this.handleWebsocketMessage.bind(this);
    this.socket.onclose = this.handleWebsocketClose.bind(this);

};

Whiteboard.prototype.handleWebsocketMessage = function(message) {
	 var command = null;	
    try {
    	console.log("message.data:",message.data);
        command = JSON.parse(message.data);
    }
    catch(e) { /* do nothing */ }
    
    if (command) {
        this.dispatchCommand(command);
    }
};

Whiteboard.prototype.handleWebsocketClose = function() {
    alert("WebSocket Connection Closed.");
};

Whiteboard.prototype.dispatchCommand = function(command) {
    // Do we have a handler function for this command?
    var handler = this.messageHandlers[command.msg];
    if (typeof(handler) === 'function') {
        // If so, call it and pass the parameter data
        handler.call(this, command.data);
    }
};

Whiteboard.prototype.initCommands = function(commandList) {
    /* Upon connection, the contents of the whiteboard
       are drawn by replaying all commands since the
       last time it was cleared */
    commandList.forEach(function(command) {
        this.dispatchCommand(command);
    }.bind(this));
};

Whiteboard.prototype.sendClear = function() {
	document.getElementById("content").value="";
    this.socket.send(JSON.stringify({ msg: 'clear' }));
};

//by ggg
Whiteboard.prototype.sendContent = function(content) {
    
	console.log("sendContent:",content);
    this.socket.send(JSON.stringify({
        msg: 'doContent',
        data: {
        	content: content
        }
    }));
    
    
};
//来自服务器端的命令
Whiteboard.prototype.doContent = function(data) {
    var content = data.content;
	document.getElementById("content").value=content;
};



Whiteboard.prototype.clear = function() {
	document.getElementById("content").value="";
};
