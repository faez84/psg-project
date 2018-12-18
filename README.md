# Challenge: Paper-scissor-rock
Description: 
Build a game, where two players with different strategies are playing against each other.  
- Scissor beats paper 
- Rock beats scissors 
- Paper beats rock 
- if both players choose the same, it’s a tie 
Implement two players: 
Player A: chooses paper every time 
Player B: makes a random choice every time 
The players will compete 100 times against each other. 
As result we would like to know, who wins more often? 
An example result would look like this: 
"Player A wins 31 of 100 games" 
"Player B wins 37 of 100 games" 
"Tie: 32 of 100 games" 
"Winner is: Player B  (37 to 31 wins)" 

Setup
-------
**Step 1:** Start nginx, PHP with the command line
`
docker-compose up -d
`

**Step 2:** Let Composer builds the applications
```
docker-compose exec newspider sh
compose update
```
**Step 3:** After successful installation, open the game at 
*http://localhost:8070*

