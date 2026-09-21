@echo off
echo Stopping Cloudflare Tunnel...
taskkill /IM cloudflared.exe /F >nul 2>&1
echo Tunnel stopped successfully.
pause
