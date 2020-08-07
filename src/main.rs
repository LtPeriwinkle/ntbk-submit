use std::net::{TcpListener, TcpStream};
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
    let mut buffer = String::new();

    stream.read_to_string(&mut buffer).unwrap();
    println!("{}", buffer);
}
