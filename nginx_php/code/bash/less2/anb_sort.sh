#!/bin/bash
tail -n +2 citydata.txt | awk '{print $3}' | sort | uniq -c | sort -rn | head -3
