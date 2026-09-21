@echo off
echo ========================================================
echo Starting Grand Vanilla Cloudflare Tunnel...
echo ========================================================
.\cloudflared.exe tunnel --protocol http2 --url http://localhost:80
pause
