class Ajax {
    static request(method, url, data, headers, callback) {
        let xhr = new XMLHttpRequest();
        xhr.open(method, url);
        if (headers) {
            Object.keys(headers).forEach(key => {
                xhr.setRequestHeader(key, headers[key]);
            });
        }
        xhr.onload = function() {
            if (xhr.status === 200) {
                callback(null, xhr.response);
            } else {
                callback(xhr.status, xhr.response);
            }
        }
        
        xhr.send(data);
    }
    static get(url, callback) {
        this.request("GET", url, null, null, callback);
    }
    static post(url, data, callback) {
        this.request("POST", url, data, { "Content-type": "application/json" }, callback);
    }
    static put(url, data, callback) {
        this.request("PUT", url, data, { "Content-type": "application/json" }, callback);
    }
    static delete(url, callback) {
        this.request("DELETE", url, null, null, callback);
    }
}

export { Ajax }