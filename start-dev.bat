@echo off

docker compose up -d

timeout /t 2 > nul

docker compose exec planner npm run dev

timeout /t 2 > nul

start http://localhost

exit