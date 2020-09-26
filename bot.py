#!/usr/bin/python
import discord
from dotenv import load_dotenv
import sys, os
from pathlib import Path

load_dotenv()
class DMBot(discord.Client):
    async def on_ready(self):
        usr = client.get_user(os.getenv("uid"))
        name = sys.argv[1]
        name = Path(name)
        file = open(name)
        text = file.read()
        await usr.send(text)
        sys.exit()
t = os.getenv("token")
client = DMBot()
client.run(t)
