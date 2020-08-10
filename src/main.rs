use std::net::{TcpListener, TcpStream};
use std::fs;
use std::fs::File;
use std::io::prelude::*;
mod components;
use components::*;

fn main() {
    let listener = TcpListener::bind("127.0.0.1:3030").unwrap();
    let pool = ThreadPool::new(8);

    for stream in listener.incoming() {
        let stream = stream.unwrap();

        pool.execute(|| {
            handle_connection(stream);
        });
    }
}

fn handle_connection(mut stream: TcpStream) {
    let mut buffer = [0; 1024];
    stream.read(&mut buffer).unwrap();
    let request = String::from_utf8_lossy(&buffer[..]);
    let req_vec: Vec<&str> = request.split(' ').collect();
    let mut type_buf = [0; 17];
    stream.read(&mut type_buf).unwrap();
    let type_string = String::from_utf8_lossy(&type_buf[..]);
    let type_string: String;
    unsafe {type_string = String::from_utf8_unchecked(type_buf.to_vec());}
    let req_vec: Vec<&str> = type_string.split(' ').collect();
    if req_vec[0] == "GET" {
        send_page(req_vec[1], stream);
        println!("{}", req_vec[1]);
    } else {
        handle_post(stream);
    }
}

fn send_page(path: &str, mut stream: TcpStream) {
    let file: String;
    match path {
        "/" => file = fs::read_to_string("site/home.html").unwrap(),
        "/home.css" => file = fs::read_to_string("site/css/home.css").unwrap(),
        "/tutorial" => file = fs::read_to_string("site/howto.html").unwrap(),
        "/date.js" => file = fs::read_to_string("site/js/date.js").unwrap(),
        "/contribute" => file = fs::read_to_string("site/submit.html").unwrap(),
        _ => file = "".to_string(),
        _ => file = fs::read_to_string("site/html/no.html").unwrap(),
    }
    stream.write(format!("HTTP/1.1 200 OK\r\nContent-Length: {}\r\n\r\n{}", file.len(), file).as_bytes()).unwrap();
}

fn handle_post(mut stream: TcpStream) {
    let mut buf = [0; 2048];
    let mut full_string = String::new();
    loop {
        let num_bytes = stream.read(&mut buf).unwrap();
        let chunk: String;
        unsafe {chunk = String::from_utf8_unchecked(buf.to_vec());}
        full_string.push_str(&chunk);
        if num_bytes < 2048 {
            break;
        }
    }
    let _request = File::create("post.txt").unwrap().write(full_string.as_bytes());
}
