#!/usr/bin/python
import discord
import discord.ext.commands
from dotenv import load_dotenv
import os
from watchdog.observers import Observer
from watchdog.events import PatternMatchingEventHandler
import asyncio

load_dotenv()

intents = discord.Intents.none()
intents.members = True
intents.messages = True
intents.guilds = True

t = os.getenv("token")
client = discord.ext.commands.Bot(command_prefix="", intents=intents)

global path
path = None


def created(event):
    global path
    path = event.src_path


@client.event
async def on_ready():
    print("ready")


@client.event
async def on_message(message):
    print("q")
    if (message.guild is not None and message.guild.id == 759084716023349299 and message.content == "start"):
        await message.channel.send("ahasdf")
        usr = client.get_user(658861212657909791)
        await message.channel.send("a")
        event_handler = PatternMatchingEventHandler("*", "", True, True)
        event_handler.on_created = created
        event_handler.on_modified = created
        check = "/data/send/"
        observer = Observer()
        observer.schedule(event_handler, check)
        observer.start()
        global path
        while True:
            await asyncio.sleep(2)
            if path is not None:
                file = open(path)
                await usr.send(file.read())
                path = None


client.run(t)
